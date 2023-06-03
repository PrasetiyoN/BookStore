import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class ProfileServiceService {
  private profile: any;

  constructor() {
    this.profile = {
      name: 'John Doe',
      age: 30,
      email: 'johndoe@example.com',
      phone: '1234567890',
      address: '123 Main Street',
    };
  }

  getProfile() {
    return this.profile;
  }

  updateProfile(newProfile: any) {
    this.profile = newProfile;
  }
}
