import { Component, OnInit } from '@angular/core';
import { UserdataService } from './userdata.service';
import { UserPipe } from './userdata.pipe';
import { InfiniteScrollDirective } from 'ngx-infinite-scroll';

@Component({
  selector: 'app-userdata',
  templateUrl: './userdata.component.html',
  styleUrls: ['./userdata.component.css'],
  providers: [UserdataService]
})
export class UserdataComponent implements OnInit {


  constructor(private _userdataservice: UserdataService) {
    
  }

 userdata: any;

  ngOnInit() {
    this._userdataservice.getUserdata().subscribe((userData)=> this.userdata = userData);
  }

  onScroll() {
    console.log("Scrolled!!");
  }

  abc() {
    console.log(this.userdata);
  }

}