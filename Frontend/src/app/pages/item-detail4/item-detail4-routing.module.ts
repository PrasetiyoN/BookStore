import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ItemDetail4Page } from './item-detail4.page';

const routes: Routes = [
  {
    path: '',
    component: ItemDetail4Page
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ItemDetail4PageRoutingModule {}
