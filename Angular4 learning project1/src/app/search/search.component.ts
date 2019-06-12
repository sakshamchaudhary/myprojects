import { Component, OnInit, OnDestroy, OnChanges } from '@angular/core';
import { PostService } from '../post.service';
import { ActivatedRoute } from '@angular/router';
import {Output,EventEmitter} from '@angular/core';
import { Router } from '@angular/router';
import 'rxjs/add/operator/pairwise';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css']
})
export class SearchComponent implements OnInit, OnDestroy {

  categories: any;
  posts:any;
  Searchtext:any;
  servicesubscriber:any;
  
  constructor(private _postService: PostService, private _activatedRoute: ActivatedRoute, private _router: Router) {
    this.Searchtext = this._activatedRoute.snapshot.params['searchtext'];

    _router.events.pairwise().subscribe((event) => {
      //let cd = event as HTMLInputElement;
      //console.log(event[0]);
    });
  
    this._postService.getCategories()
              .subscribe((categoriesData)=> this.categories=categoriesData);

    
  }
  ngOnInit() {
    this.servicesubscriber = this._postService.getPostsBySearch(this.Searchtext)
              .subscribe((postsData)=> this.posts=postsData);

  }
  
  ngOnDestroy() {
    console.log('destroyed');
    //this.servicesubscriber.unsubscribe();
  }

  abc(categoryId) {
    //let categoryId = this._activatedRoute.snapshot.params['categoryId'];
      this._postService.getPostsByCategory(categoryId)
                        .subscribe((postsData)=> this.posts=postsData);
  }
}
