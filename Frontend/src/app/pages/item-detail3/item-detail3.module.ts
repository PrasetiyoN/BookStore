import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ItemDetail3PageRoutingModule } from './item-detail3-routing.module';

import { ItemDetail3Page } from './item-detail3.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ItemDetail3PageRoutingModule
  ],
  declarations: [ItemDetail3Page]
})
export class ItemDetail3PageModule {}
