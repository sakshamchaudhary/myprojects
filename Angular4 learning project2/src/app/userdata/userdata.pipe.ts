import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
    name: 'UserPipe'
}) 
export class UserPipe implements PipeTransform {
    res:any=[];
    transform(value: any, searchString: string): any[]
     {
        if(searchString!="")
            this.res= value.filter(val=>(val.firstname.indexOf(searchString)!=-1 || val.email.indexOf(searchString))!=-1 );
        else 
            this.res = [];
        return this.res;
    }
}