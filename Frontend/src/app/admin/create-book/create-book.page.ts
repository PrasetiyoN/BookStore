import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { ApiServiceService } from 'src/app/services/api-service.service';

@Component({
  selector: 'app-create-book',
  templateUrl: './create-book.page.html',
  styleUrls: ['./create-book.page.scss'],
})
export class CreateBookPage implements OnInit {
  judul: string = '';
  penulis: string = '';
  gambar: any;
  harga: string = '';
  deskripsi: string = '';
  user_email: string = '';
  kategori: string = '';

  constructor(private api: ApiServiceService, private alert: AlertController) {}

  private async presentAlert(title: any, message: any) {
    const alert = await this.alert.create({
      header: 'Sample Form',
      subHeader: title,
      message: message,
      buttons: ['OK'],
    });

    await alert.present();
  }

  onFileChange(event: any) {
    this.gambar = event.target.files[0];
  }

  doPostCreateBook() {
    const formData = new FormData();
    formData.append('judul_buku', this.judul);
    formData.append('penulis', this.penulis);
    formData.append('gambar', this.gambar);
    formData.append('harga', this.harga);
    formData.append('deskripsi', this.deskripsi);
    formData.append('user_email', this.user_email);
    formData.append('kategori', this.kategori);

    this.api.CreateBook(formData).subscribe(
      (data) => {
        const jsonResponse = JSON.parse(JSON.stringify(data));
        console.log(jsonResponse.id);
        console.log('Success ==> ' + JSON.stringify(data));
        this.presentAlert(
          'Berhasil',
          'Anda Sudah Input Data Buku Dengan Benar'
        );
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

  doSubmitWithValidateFormInput() {
    var doSubmitForm = true;

    if (this.judul == null || this.judul == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Judul Buku');
      doSubmitForm = false;
    }

    if (this.penulis == null || this.penulis == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Penulis');
      doSubmitForm = false;
    }

    // if (this.gambar == null || this.gambar == '') {
    //   this.presentAlert('Peringatan', 'Anda Belum Input Data Gambar');
    //   doSubmitForm = false;
    // }

    if (this.harga == null || this.harga == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Harga');
      doSubmitForm = false;
    }

    if (this.deskripsi == null || this.deskripsi == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Deskripsi');
      doSubmitForm = false;
    }

    if (this.user_email == null || this.user_email == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data User Email');
      doSubmitForm = false;
    }

    if (this.kategori == null || this.kategori == '') {
      this.presentAlert('Peringatan', 'Anda Belum Input Data Kategori');
      doSubmitForm = false;
    }

    if (doSubmitForm) {
      this.doPostCreateBook();
    }
  }

  ngOnInit() {}
}
