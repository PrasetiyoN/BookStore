import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class ApiServiceService {
  constructor(private http: HttpClient) {}

  Login(form: any) {
    return this.http.post(
      environment.ApiBookURL + '/api/login',
      {
        email: form.email,
        password: form.password,
      },
      { responseType: 'json' }
    );
  }

  Signup(form: any) {
    return this.http.post(
      environment.ApiBookURL + '/api/register',
      {
        nama: form.nama,
        email: form.email,
        password: form.password,
        confirmation_password: form.confirmation_password,
      },
      { responseType: 'json' }
    );
  }

  CreateBook(form: any) {
    const headers = new HttpHeaders({
      responseType: 'json',
      Authorization: `Bearer ` + localStorage.getItem('token'),
    });

    return this.http.post<any>(
      environment.ApiBookURL + '/api/admin/create-buku',
      form,
      { headers }
    );
  }

  public DeleteBook(id: any) {
    return this.http.delete(
      environment.ApiBookURL + '/api/admin/delete-buku/' + id
    );
  }
}
