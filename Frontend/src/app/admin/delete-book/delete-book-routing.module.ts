import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { DeleteBookPage } from './delete-book.page';

const routes: Routes = [
  {
    path: '',
    component: DeleteBookPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class DeleteBookPageRoutingModule {}
