import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { UserPipe } from './userdata/userdata.pipe';
import { InfiniteScrollModule} from 'ngx-infinite-scroll';

import { AppComponent } from './app.component';
import { EmployeeComponent } from './employee/employee.component';
import { EmployeeCountComponent } from './employee/employeeCount.component';
import { EmployeeDetailsComponent } from './employee/employeeDetails.component';

import { HttpModule } from '@angular/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import 'hammerjs';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatButtonModule, MatCardModule, MatMenuModule, MatToolbarModule, MatIconModule, MatCheckboxModule, MatInputModule, MatOptionModule, MatSelectModule } from '@angular/material';

import { FileuploaderComponent } from './fileuploader/fileuploader.component';
import { HeaderComponent } from './header/header.component';
import { GalleryComponent } from './gallery/gallery.component';
import { MinhackComponent } from './minhack/minhack.component';
import { HomeComponent } from './home/home.component';
import { PageNotFoundComponent } from './pageNotFound/pageNotFound.component';
import { UserdataComponent } from './userdata/userdata.component';


const appRoutes: Routes = [
  { path: 'home', component: HomeComponent},
  { path: 'minihack', component: MinhackComponent},
  { path: 'employee', component: EmployeeComponent},
  { path: 'userdata', component: UserdataComponent},
  { path: 'employee/:code', component: EmployeeDetailsComponent},
  { path: '', redirectTo:'/home', pathMatch: 'full'},
  { path: '**', component: PageNotFoundComponent}
];

@NgModule({
  declarations: [
    AppComponent,
    UserPipe,
    EmployeeComponent,
    EmployeeCountComponent,
    FileuploaderComponent,
    HeaderComponent,
    GalleryComponent,
    MinhackComponent,
    HomeComponent,
    PageNotFoundComponent,
    EmployeeDetailsComponent,
    UserdataComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    BrowserAnimationsModule,
    InfiniteScrollModule,
    MatButtonModule,
    MatCardModule,
    MatMenuModule,
    MatToolbarModule, 
    MatIconModule,
    MatCheckboxModule,
    MatInputModule,
    ReactiveFormsModule,
    MatOptionModule,
    MatSelectModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
