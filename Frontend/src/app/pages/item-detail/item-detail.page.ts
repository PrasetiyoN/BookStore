import { Component, OnInit } from '@angular/core';
import { MenuController } from '@ionic/angular';


@Component({
  selector: 'app-item-detail',
  templateUrl: './item-detail.page.html',
  styleUrls: ['./item-detail.page.scss'],
})
export class ItemDetailPage implements OnInit {

  constructor(
    public menu : MenuController
  ) { }

  ngOnInit() {
  }

  ionViewWillEnter() {
    this.menu.enable(false);
  }

}
