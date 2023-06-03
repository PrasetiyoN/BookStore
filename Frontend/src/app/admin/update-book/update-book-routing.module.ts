import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { UpdateBookPage } from './update-book.page';

const routes: Routes = [
  {
    path: '',
    component: UpdateBookPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class UpdateBookPageRoutingModule {}
