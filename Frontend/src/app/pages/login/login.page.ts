import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { environment } from 'src/environments/environment';
import { ApiServiceService } from 'src/app/services/api-service.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  form = {
    email: '',
    password: '',
  };

  constructor(
    private api: ApiServiceService,
    private alert: AlertController,
    private router: Router
  ) {}

  private async presentAlert(title: any, message: any) {
    const alert = await this.alert.create({
      header: 'Sample Form',
      subHeader: title,
      message: message,
      buttons: ['OK'],
    });

    await alert.present();
  }

  doSubmitWithValidateFormInput() {
    var doSubmitForm = true;

    if (this.form.email == null || this.form.email == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Nama Lengkap');
      doSubmitForm = false;
    }

    if (this.form.password == null || this.form.password == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Pekerjaan');
      doSubmitForm = false;
    }

    if (doSubmitForm) {
      this.ActLogin();
    }
  }

  ActLogin() {
    this.api.Login(this.form).subscribe(
      (respone) => {
        const jsonResponse = JSON.parse(JSON.stringify(respone));
        console.log('Nama ======>' + jsonResponse.data.nama);
        console.log('Success ==> ' + JSON.stringify(respone));
        localStorage.setItem('token', jsonResponse.token);
        localStorage.setItem('role_user', jsonResponse.data.role);
        this.presentAlert(
          'Berhasil',
          'Anda Sudah Input Data User Dengan Benar'
        );

        if (localStorage.getItem('role_user') === 'admin') {
          this.router.navigate(['/home']);
        } else if (localStorage.getItem('role_user') === 'user') {
          this.router.navigate(['/tabs']);
        }
      },
      (err) => {
        console.error('Gagal Create user ===> ', err.status);
        this.presentAlert(
          'Gagal Create user',
          'Create user gagal. Silahkan cek kembali jaringan internet anda.'
        );
      }
    );
  }

  ngOnInit() {}
}
