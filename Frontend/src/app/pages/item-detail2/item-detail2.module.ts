import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ItemDetail2PageRoutingModule } from './item-detail2-routing.module';

import { ItemDetail2Page } from './item-detail2.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ItemDetail2PageRoutingModule
  ],
  declarations: [ItemDetail2Page]
})
export class ItemDetail2PageModule {}
