import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { Tab4PageModule } from './tab4/tab4.module';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'signup',
    pathMatch: 'full',
  },
  { path: 'profile', component: Tab4PageModule },

  {
    path: '',
    loadChildren: () =>
      import('./tabs/tabs.module').then((m) => m.TabsPageModule),
  },
  {
    path: 'login',
    loadChildren: () =>
      import('./pages/login/login.module').then((m) => m.LoginPageModule),
  },
  {
    path: 'signup',
    loadChildren: () =>
      import('./pages/signup/signup.module').then((m) => m.SignupPageModule),
  },
  {
    path: 'tab1',
    loadChildren: () =>
      import('./tab1/tab1.module').then((m) => m.Tab1PageModule),
  },
  {
    path: 'tab2',
    loadChildren: () =>
      import('./tab2/tab2.module').then((m) => m.Tab2PageModule),
  },

  {
    path: 'tab4',
    loadChildren: () =>
      import('./tab4/tab4.module').then((m) => m.Tab4PageModule),
  },
  {
    path: 'item-detail',
    loadChildren: () =>
      import('./pages/item-detail/item-detail.module').then(
        (m) => m.ItemDetailPageModule
      ),
  },
  {
    path: 'checkout',
    loadChildren: () =>
      import('./checkout/checkout.module').then((m) => m.CheckoutPageModule),
  },
  {
    path: 'confirm',
    loadChildren: () =>
      import('./confirm/confirm.module').then((m) => m.ConfirmPageModule),
  },
  {
    path: 'list-users',
    loadChildren: () =>
      import('./admin/list-users/list-users.module').then(
        (m) => m.ListUsersPageModule
      ),
  },

  {
    path: 'home',
    loadChildren: () =>
      import('./admin/home/home.module').then((m) => m.HomePageModule),
  },

  {
    path: 'update-book',
    loadChildren: () =>
      import('./admin/update-book/update-book.module').then(
        (m) => m.UpdateBookPageModule
      ),
  },
  {
    path: 'item-detail2',
    loadChildren: () =>
      import('./pages/item-detail2/item-detail2.module').then(
        (m) => m.ItemDetail2PageModule
      ),
  },
  {
    path: 'item-detail3',
    loadChildren: () =>
      import('./pages/item-detail3/item-detail3.module').then(
        (m) => m.ItemDetail3PageModule
      ),
  },
  {
    path: 'item-detail4',
    loadChildren: () =>
      import('./pages/item-detail4/item-detail4.module').then(
        (m) => m.ItemDetail4PageModule
      ),
  },
  {
    path: 'create-book',
    loadChildren: () =>
      import('./admin/create-book/create-book.module').then(
        (m) => m.CreateBookPageModule
      ),
  },
  {
    path: 'delete-book',
    loadChildren: () => import('./admin/delete-book/delete-book.module').then( m => m.DeleteBookPageModule)
  },
];
@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
  ],
  exports: [RouterModule],
})
export class AppRoutingModule {}
