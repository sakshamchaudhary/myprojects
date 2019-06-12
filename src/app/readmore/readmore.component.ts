import { Component, OnInit } from '@angular/core';
import { PostService } from '../post.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-readmore',
  templateUrl: './readmore.component.html',
  styleUrls: ['./readmore.component.css'],
  providers: [PostService]
})
export class ReadmoreComponent implements OnInit {

  post: any;

  constructor(private _postService: PostService, private _activatedRoute: ActivatedRoute) { }

  ngOnInit() {
    let postId = this._activatedRoute.snapshot.params['postid'];
    this._postService.getreadmore(postId)
                      .subscribe((postsData)=> this.post=postsData);
  }

}
