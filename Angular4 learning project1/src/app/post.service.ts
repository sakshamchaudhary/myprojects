import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import 'rxjs/add/observable/throw';

@Injectable()
export class PostService {

    constructor(private _http: Http) {
    }

    getCategories(): any {
        return this._http.get("http://localhost/NGdecotechcraftsAPIs/api.php?getcategories=1")
            .map((response: Response)=> response.json())
    }

    getallposts(): any {
        return this._http.get("http://localhost/NGdecotechcraftsAPIs/api.php?getallposts=1")
            .map((response: Response)=> response.json())
    }

    getPostsByCategory(categoryId): any {
        return this._http.get("http://localhost/NGdecotechcraftsAPIs/api.php?getposts=1&category_id="+categoryId)
            .map((response: Response)=> response.json())
    }

    getreadmore(postId): any {
        return this._http.get("http://localhost/NGdecotechcraftsAPIs/api.php?readmore=1&post_id="+postId)
            .map((response: Response)=> response.json())
    }

    getPostsBySearch(Searchtext): any {
        
        return this._http.get("http://localhost/NGdecotechcraftsAPIs/api.php?searchbytitle=1&searchtext="+Searchtext)
            .map((response: Response)=> response.json())

    }

    /*getEmployeeByCode(empCode: string): Observable<IEmployee> {
        return this._http.get("http://localhost/employeeNG4/employees/" + empCode)
                        .map((response: Response)=> <IEmployee>response.json())
                        .catch(this.handleError);
    }*/

    handleError(error: Response) {
        console.error(error);
        return Observable.throw(error);
    }
}