import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ItemDetail4Page } from './item-detail4.page';

describe('ItemDetail4Page', () => {
  let component: ItemDetail4Page;
  let fixture: ComponentFixture<ItemDetail4Page>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(ItemDetail4Page);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
