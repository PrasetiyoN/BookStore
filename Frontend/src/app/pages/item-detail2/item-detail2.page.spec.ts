import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ItemDetail2Page } from './item-detail2.page';

describe('ItemDetail2Page', () => {
  let component: ItemDetail2Page;
  let fixture: ComponentFixture<ItemDetail2Page>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(ItemDetail2Page);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
