import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MinhackComponent } from './minhack.component';

describe('MinhackComponent', () => {
  let component: MinhackComponent;
  let fixture: ComponentFixture<MinhackComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MinhackComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MinhackComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
