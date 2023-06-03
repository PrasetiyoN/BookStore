import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ItemDetail2Page } from './item-detail2.page';

const routes: Routes = [
  {
    path: '',
    component: ItemDetail2Page
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ItemDetail2PageRoutingModule {}
