import { Component, OnInit } from '@angular/core';
import { IEmployee } from './employee';
import { EmployeeService } from './employee.service';

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css'],
  providers: [EmployeeService]
})
export class EmployeeComponent implements OnInit {

  employees: IEmployee[];
  statusMessage: string ='Loadig Data. Please Wait..';

  constructor(private _employeeSerice: EmployeeService) {
  }

  ngOnInit() {
    this._employeeSerice.getEmployees()
              .subscribe((employeeData)=> this.employees=employeeData,
                          (error)=> {this.statusMessage='Problem with service. Please try again after some time.';
                                    //console.error(error);
                        });
  }

  selectedCountButton: string = 'all';
  onCountRadioChange(selectedRadioValue: string): void {
    this.selectedCountButton = selectedRadioValue;
  }

  getTotalEmployeesCount(): number {
    return this.employees.length;
  }

  getTotalMaleEmployeesCount(): number {
    return this.employees.filter(e=> e.gender==="male").length;
  }

  getTotalFemaleEmployeesCount(): number {
    return this.employees.filter(e=> e.gender==="female").length;
  }

  

}
