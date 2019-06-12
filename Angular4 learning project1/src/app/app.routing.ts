import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { SearchComponent } from './search/search.component';
import { ReadmoreComponent } from './readmore/readmore.component';
import { ContactComponent } from './contact/contact.component';

const routes: Routes = [
    {path: 'contact', component: ContactComponent},
    {path: 'search/:searchtext', component: SearchComponent},
    {path: 'readmore/:postid', component: ReadmoreComponent},
    {path: '', component: HomeComponent},
    {path: '**', redirectTo: ''}
  ];

@NgModule({
    imports:[RouterModule.forRoot(routes)],
    exports:[RouterModule]
})
export class AppRoutingModule {}

export const routingComponents = [ContactComponent, SearchComponent, ReadmoreComponent, HomeComponent];
