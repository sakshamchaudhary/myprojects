import { Component } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';

import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
 
export class AppComponent {
  myData;

  rForm: FormGroup;
  post: any;
  description: string ="";
  name: string ="";

  constructor(private http: Http, private fb: FormBuilder) {
    
    /*this.http.get('https://jsonplaceholder.typicode.com/photos')
      .map(Response => Response.json())
      .subscribe(res => this.myData = res);*/

    this.rForm = fb.group({
      'name':[null, Validators.required],
      'description': [null, Validators.compose([Validators.required, Validators.minLength(3), Validators.maxLength(10)])],
      'validate': ''
    });
  }

  addPost(post) {
    this.description = post.description;
    this.name = post.name;
  }
  
}
