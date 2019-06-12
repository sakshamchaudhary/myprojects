import { Component, OnInit } from '@angular/core';
import { PostService } from '../post.service';
import { ActivatedRoute } from '@angular/router';
import { ElementRef, SimpleChange } from '@angular/core';
import { HostListener } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
  providers: [PostService]
})
export class HomeComponent implements OnInit {

  categories: any;
  posts:any;

  constructor(private _postService: PostService, private _activatedRoute: ActivatedRoute) { }

  ngOnInit() {
    this._postService.getCategories()
              .subscribe((categoriesData)=> this.categories=categoriesData);
    
    this._postService.getallposts()
              .subscribe((postsData)=> this.posts=postsData);
  }

  print() {
    console.log(this.posts);
  }
  abc(categoryId) {
    //let categoryId = this._activatedRoute.snapshot.params['categoryId'];
      this._postService.getPostsByCategory(categoryId)
                        .subscribe((postsData)=> this.posts=postsData);
  }

  /*onScroll(event:any) {
    console.log(event.target.scrollTop);
  }*/


}
