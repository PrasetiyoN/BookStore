import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ItemDetail4PageRoutingModule } from './item-detail4-routing.module';

import { ItemDetail4Page } from './item-detail4.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ItemDetail4PageRoutingModule
  ],
  declarations: [ItemDetail4Page]
})
export class ItemDetail4PageModule {}
