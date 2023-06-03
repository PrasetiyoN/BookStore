import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ItemDetail3Page } from './item-detail3.page';

const routes: Routes = [
  {
    path: '',
    component: ItemDetail3Page
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ItemDetail3PageRoutingModule {}
