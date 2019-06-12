import { Injectable } from '@angular/core';
import { Response, Http } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

@Injectable ()
export class UserdataService {
    
    constructor(private _http: Http) {
    }

    getUserdata(): any {
        return this._http.get('http://localhost/register_form/thankyou.php').map((response: Response)=>response.json());
    }

}