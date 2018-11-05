import React from 'react';
import { Link } from 'react-router-dom';
import { connect } from 'react-redux';
import Logo from './logo.png';

//import './index.css';

import { userActions } from '../_actions';

class HomePage extends React.Component {
    componentDidMount() {
        this.props.dispatch(userActions.getAll());
    }

    handleDeleteUser(id) {
        return (e) => this.props.dispatch(userActions.delete(id));
    }

    /*render() {
        const { user, users } = this.props;
        return (
            <div className="col-md-6 col-md-offset-3">
                <h1>Hi {user.firstName}!</h1>
                <p>You're logged in with React!!</p>
                <h3>All registered users:</h3>
                {users.loading && <em>Loading users...</em>}
                {users.error && <span className="text-danger">ERROR: {users.error}</span>}
                {users.items &&
                    <ul>
                        {users.items.map((user, index) =>
                            <li key={user.id}>
                                {user.firstName + ' ' + user.lastName}
                                {
                                    user.deleting ? <em> - Deleting...</em>
                                    : user.deleteError ? <span className="text-danger"> - ERROR: {user.deleteError}</span>
                                    : <span> - <a onClick={this.handleDeleteUser(user.id)}>Delete</a></span>
                                }
                            </li>
                        )}
                    </ul>
                }
                <p>
                    <Link to="/login">Logout</Link>
                </p>
            </div>
        );
    }*/

    render() {
        return (
            <div className="main">
                <div className="header">
                    <a href="#" className="homepage"><b>HATTYUK</b></a>
                    <a href="#" className="navbarlink1">LANGUAGE</a>
                    <a href="#" className="navbarlink2">ABOUT US</a>
                    <a href="#" className="navbarlink2">CONTACT</a>
                    <Link to="/login" className="loginlink">LOG IN</Link>
                </div>
                <div className="welcome">
                    <i><b>WELCOME,</b> THIS SITE<br/>
                        SHOWS OUR STUDENTS POINTS,<br/>
                        WHAT THEY EARNED IN THE<br/>
                        SEMESTER...
                    </i>            
                </div>
                <div className="top5">
                    <table className="myTable"> 
                        <caption>Top &nbsp;&nbsp;&nbsp;<b> 5 </b>&nbsp;&nbsp;&nbsp; list</caption>               
                        <tr>
                            <td className="border_here">1.</td>
                            <td>Szabi</td>
                            <td>55.000</td>
                            <td>BADGEK</td>
                        </tr>
                        <tr>
                            <td className="border_here">2.</td>
                            <td>Szabi</td>
                            <td>45.000</td>
                            <td>BADGEK</td>
                        </tr>
                        <tr>
                            <td className="border_here">3.</td>
                            <td>Szabi</td>
                            <td>35.000</td>
                            <td>BADGEK</td>
                        </tr>
                        <tr>
                            <td className="border_here">4.</td>
                            <td>Szabi</td>
                            <td>25.000</td>
                            <td>BADGEK</td>
                        </tr>
                        <tr>
                            <td className="border_here">5.</td>
                            <td>Szabi</td>
                            <td>15.000</td>
                            <td>BADGEK</td>
                        </tr>
                    </table>
                </div>
                <div className="badges">
                    <div className="b1"><img src={ Logo }/><h3>OKAY<br/>STUDENT</h3> </div>
                    <div className="b1"><img src={ Logo }/><h3>GUCCI<br/>HOMEWORK</h3> </div>
                    <div className="b1"><img src={ Logo }/><h3>BEST<br/>TEAMWORK</h3> </div>            
                    <div className="b2"><img src={ Logo }/><h3>GOOD<br/>STUDENT</h3> </div>
                    <div className="b2"><img src={ Logo }/><h3>GUCCI<br/>HOMEWORK</h3> </div>
                    <div className="b2"><img src={ Logo }/><h3>BEST<br/>TEAMWORK</h3> </div>
                </div>
                <div className="help">
                    <h1>HOW CAN WE HELP YOU?</h1>
                    <a href="#" className="button">Go read</a>
                </div>
                <div className="footer">
                    <i>COPYRIGHT @ HATTYUK</i>
                </div>
            </div>
        );
    }
}

function mapStateToProps(state) {
    const { users, authentication } = state;
    const { user } = authentication;
    return {
        user,
        users
    };
}

const connectedHomePage = connect(mapStateToProps)(HomePage);
export { connectedHomePage as HomePage };