import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ItemDetail3Page } from './item-detail3.page';

describe('ItemDetail3Page', () => {
  let component: ItemDetail3Page;
  let fixture: ComponentFixture<ItemDetail3Page>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(ItemDetail3Page);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
