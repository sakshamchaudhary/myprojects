import { Component, OnInit } from '@angular/core';
import { IEmployee } from './employee';
import { EmployeeService } from './employee.service';
import { ActivatedRoute } from '@angular/router';

@Component({
    template: 'Details Here.',
    templateUrl: './employeeDetails.component.html',
    styleUrls: ['./employeeDetails.component.css'],
    providers: [EmployeeService]
})
export class EmployeeDetailsComponent implements OnInit {
    employee: IEmployee;
    statusMessage: string = 'Data Loading. Please wait.';

    constructor( private _employeeService: EmployeeService, private _activatedRoute: ActivatedRoute) {
    }

    ngOnInit() {
        let empCode = this._activatedRoute.snapshot.params['code'];
        this._employeeService.getEmployeeByCode(empCode)
                            .subscribe((employeeData)=> {
                                            if(employeeData==null) {
                                                this.statusMessage='Employee with the specified employee code not exist.'
                                            } else this.employee=employeeData;},
                                        (error)=> {this.statusMessage='Problem with service. Please try again after some time.'});
    }
}