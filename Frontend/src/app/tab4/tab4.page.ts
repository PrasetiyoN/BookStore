import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-tab4',
  templateUrl: './tab4.page.html',
  styleUrls: ['./tab4.page.scss'],
})
export class Tab4Page implements OnInit {
  username: any;
  email: any;

  constructor(private router: Router) {}

  ngOnInit() {
    this.username = 'John Doe';
    this.email = 'johndoe@example.com';
  }

  saveChanges() {
    // Logika untuk menyimpan perubahan ke sumber data (misalnya, API)
    // Misalnya, mengirim permintaan ke endpoint backend untuk menyimpan data
    console.log('Username:', this.username);
    console.log('Email:', this.email);
    // Anda dapat mengirim permintaan HTTP menggunakan HttpClient di sini
  }

  logout() {
    // Logika logout
    // Misalnya, menghapus token dari penyimpanan atau membersihkan sesi pengguna
    // Kemudian arahkan kembali ke halaman login
    this.router.navigate(['/login']);
  }
}
