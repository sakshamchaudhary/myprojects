import { Component, OnInit, Input } from '@angular/core';
import { Http } from '@angular/http';
import { GalleryComponent } from '../gallery/gallery.component';

@Component({
  selector: 'app-fileuploader',
  templateUrl: './fileuploader.component.html',
  styleUrls: ['./fileuploader.component.css']
})
export class FileuploaderComponent implements OnInit {

  @Input()
    gallery: GalleryComponent;

  constructor(private http: Http) { }

  ngOnInit() {
  }

  imgAvailable: string = null;
  imgEvent: any = null;

  showImage(event: any) {
    if(event.target.files && event.target.files[0]) {
      this.imgEvent = event;
      let obj = new FileReader;
      obj.onload = (event: any) => {
        this.imgAvailable = event.target.result;
      }
      obj.readAsDataURL(event.target.files[0]);
    }
  }

  uploadFile() {
      let elem = this.imgEvent.target;
      if(elem.files.length > 0) {
        let formData = new FormData();
        formData.append('file', elem.files[0]);
        //console.log(formData);

        this.http.post('http://localhost/imgrecieverpage/server.php', formData)
        .subscribe((data) => {

          //this.gallery.gotServerData();
          //console.log(GalleryComponent);

          //console.log('got some data from server',data);
        }, (error) => {
          console.log('Error!!!',error);
        })
      }
  }

}
