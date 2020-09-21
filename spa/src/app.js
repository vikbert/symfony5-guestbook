import { h, render } from "preact";
import { Router, Link } from "preact-router";
import Home from "./pages/home";
import Conference from "./pages/conference";
import "../assets/css/app.scss";
import { useState, useEffect } from "preact/hooks";
import { findConferences } from "./api/api";

function App() {
    const [conferences, setConferences] = useState(null);
    
	useEffect(() => {
		findConferences().then((conferences) => setConferences(conferences));
    }, []);
    
    console.log(conferences)
    if (conferences === null) {
        return <div className="text-center pt-5">loading ...</div>
    }

	return (
		<div>
			<header className="header">
				<nav className="navbar navbar-light bg-light">
					<div className="container">
						<Link className="navbar-brand mr-4 pr-2" href="/">
							&#128217; Guestbook
						</Link>
					</div>
				</nav>
				<nav className="bg-light border-bottom text-center">
                    {conferences.map((conference) => (
                        <Link className="nav-conference" href={'/conference/' + conference.slug}>
                            {conference.city} {conference.year}
					    </Link>
                    ))}
				</nav>
			</header>
			<Router>
                <Home path="/" conferences={conferences}/>
                <Conference path="/conference/:slug" conferences={conferences}></Conference>
			</Router>
		</div>
	);
}

render(<App />, document.getElementById("app"));
