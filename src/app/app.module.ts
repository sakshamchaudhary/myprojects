import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router'; 
import { HttpModule } from '@angular/http';
import { InfiniteScrollModule} from 'ngx-infinite-scroll';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { routingComponents, AppRoutingModule } from './app.routing';

@NgModule({
  declarations: [
    AppComponent,
    routingComponents
  ],
  imports: [
    BrowserModule,HttpModule,
    InfiniteScrollModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
