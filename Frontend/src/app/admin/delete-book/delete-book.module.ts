import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { DeleteBookPageRoutingModule } from './delete-book-routing.module';

import { DeleteBookPage } from './delete-book.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    DeleteBookPageRoutingModule
  ],
  declarations: [DeleteBookPage]
})
export class DeleteBookPageModule {}
