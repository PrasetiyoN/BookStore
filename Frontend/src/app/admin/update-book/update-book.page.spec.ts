import { ComponentFixture, TestBed } from '@angular/core/testing';
import { UpdateBookPage } from './update-book.page';

describe('UpdateBookPage', () => {
  let component: UpdateBookPage;
  let fixture: ComponentFixture<UpdateBookPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(UpdateBookPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
