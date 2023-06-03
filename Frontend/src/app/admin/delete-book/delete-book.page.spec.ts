import { ComponentFixture, TestBed } from '@angular/core/testing';
import { DeleteBookPage } from './delete-book.page';

describe('DeleteBookPage', () => {
  let component: DeleteBookPage;
  let fixture: ComponentFixture<DeleteBookPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(DeleteBookPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
