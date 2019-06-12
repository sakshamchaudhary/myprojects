import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Http } from '@angular/http';

@Component({
  selector: 'app-minhack',
  templateUrl: './minhack.component.html',
  styleUrls: ['./minhack.component.css']
})
export class MinhackComponent implements OnInit {

  groupName: string;
  numberOfMembers: number=0;

  names: string[] = [];
  branches: string[] = [];
  years: string[] = [];
  emails: string[] = [];

  members: any[] = [];
  
  constructor(private _http: Http) { }

  ngOnInit() {
  }

  registerGroup(wholeData) {
    //this._http.post("http://localhost/ng4_minihack/server.php",wholeData).map(res=>res.json());
    alert('hi');
  }

  generateForm(frm) {
    this.numberOfMembers = frm.value.noOfMembers;
    let i;
    this.members = [];
    for(i=0;i<this.numberOfMembers;i++) {
      this.members[i] = ({'member':i+1, 'name':'', 'email':'', 'branch':'', 'year':''});
    };
  }

  submitForm(frm) {
    //this.groupName = frm.value.groupName;
    let i;
    for(i=0;i<this.numberOfMembers;i++) {
      this.members[i] = ({'member':i+1, 'name':this.names[i], 'email':this.emails[i], 'branch':this.branches[i], 'year':this.years[i]});
    };
    let wholeData = ({'grpname':this.groupName, 'grpno':this.numberOfMembers, 'data':this.members});
    this.registerGroup(wholeData);
    //console.log(wholeData);
  }
}
