import { h } from "preact";
import { Router, Link } from 'preact-router';
import Conference from "./conference";

export default function Home({ conferences}) {
    if (conferences === null) {
        return <div className="p-3 text-center">No conferences yet</div>
    }

    return <div className="p-3">
        {conferences.map((conference)=> (
               <div className="card border shadow-sm lift mb-3">
                   <div className="card-body">
                       <div className="card-title">
                           <h4 className="font-weight-light">
                               {conference.city} {conference.year}
                           </h4>
                       </div>

                       <Link className="btn btn-sm btn-blue stretched-link" href={'/conference/'+conference.slug}>
                           View
                       </Link>
                   </div>
               </div>
           ))}
    </div>;
}
