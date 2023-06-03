import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { environment } from 'src/environments/environment';
import { ApiServiceService } from 'src/app/services/api-service.service';
import { AlertController } from '@ionic/angular';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.page.html',
  styleUrls: ['./signup.page.scss'],
})
export class SignupPage implements OnInit {
  form = {
    nama: '',
    email: '',
    password: '',
    confirmation_password: '',
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

    if (this.form.nama == null || this.form.nama == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Nama Lengkap');
      doSubmitForm = false;
    }

    if (this.form.email == null || this.form.email == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data email');
      doSubmitForm = false;
    }

    if (this.form.password == null || this.form.password == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Password');
      doSubmitForm = false;
    }

    if (
      this.form.confirmation_password == null ||
      this.form.confirmation_password == 'Anda Belum Input Data Password'
    ) {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Password');
      doSubmitForm = false;
    }

    if (doSubmitForm) {
      this.ActRegister();
    }
  }

  ActRegister() {
    this.api.Signup(this.form).subscribe(
      (data) => {
        const jsonResponse = JSON.parse(JSON.stringify(data));
        console.log('Nama ======>' + jsonResponse.data.nama);
        console.log('Success ==> ' + JSON.stringify(data));
        this.presentAlert(
          'Berhasil',
          'Anda Sudah Input Data User Dengan Benar'
        );
        this.router.navigate(['/login']);
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
