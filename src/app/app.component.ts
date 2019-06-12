import {ComponentFactoryResolver, ViewContainerRef, ViewChild, ComponentRef} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import { SearchComponent } from './search/search.component';



import { Component } from '@angular/core';
import { PostService } from './post.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css'],
  providers: [PostService]
})
export class AppComponent {
  title = 'app';
  searchdata: string='';


  private searchComponentRef: ComponentRef<SearchComponent>;
  constructor(private componentFactoryResolver: ComponentFactoryResolver, private _postService: PostService, private _activatedRoute: ActivatedRoute, private _router: Router) {
    console.log(this.searchComponentRef);
  }

  fn() {
    let ab = event.target as HTMLInputElement;
    console.log(ab.value);
    let searchtext: string = ab.value;
    this._router.navigate(['/search',searchtext]);
  }

  fn2() {
    //console.log(this.searchdata);
    if (this.searchComponentRef) {
      this.searchComponentRef.destroy();
    }
    else {
      console.log("not done");
    }
    this._router.navigate(['/search',this.searchdata]);
  }

}


