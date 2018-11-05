import React from 'react';
import { Link } from 'react-router-dom';
import { connect } from 'react-redux';
import Logo from '../HomePage/logo.png';

import './design.css';

import { userActions } from '../_actions';

class AdminPage extends React.Component {
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
            <div id="main">
                <div className="header">
                    <a href="#" className="homepage"><b>HATTYUK</b></a>
                    <a href="#" className="navbarlink1">LANGUAGE</a>
                    <a href="#" className="navbarlink2">POINT SYSTEM</a>
                    <a href="#" className="navbarlink2">ADD/REMOVE</a>
                    <a href="#" className="loginlink">Admin neve    </a>
                </div>
                <div className="welcome">
                    <i><b>WELCOME, Admin </b> <br/>
                        You can add/remove/edit the  STUDENTS POINTS,<br/>
                        WHAT THEY EARNED IN THE<br/>
                        SEMESTER...
                    </i>            
                </div>
                <div className="top5">
                    <table id="myTable"> 
                        <caption>Student &nbsp;&nbsp;&nbsp; Badge &nbsp;&nbsp;&nbsp; List</caption>               
                        <tr>
                            <td id="border_here">1.</td>
                            <td>Student1</td>
                            <td>points</td>
                            <td>BADGEK</td>
                            <td><input type="button" value="EDIT"/></td>
                        </tr>
                        <tr>
                            <td id="border_here">2.</td>
                            <td>Student2</td>
                            <td>points</td>
                            <td>BADGEK</td>
                            <td><input type="button" value="EDIT"/></td>
                        </tr>
                        <tr>
                            <td id="border_here">3.</td>
                            <td>Student3</td>
                            <td>points</td>
                            <td>BADGEK</td>
                            <td><input type="button" value="EDIT"/></td>
                        </tr>
                        <tr>
                            <td id="border_here">4.</td>
                            <td>Student4</td>
                            <td>points</td>
                            <td>BADGEK</td>
                            <td><input type="button" value="EDIT"/></td>
                        </tr>
                        <tr>
                            <td id="border_here">5.</td>
                            <td>Student5</td>
                            <td>points</td>
                            <td>BADGEK</td>
                            <td><input type="button" value="EDIT"/></td>
                        </tr>
                    </table>
                </div>
                <div className="badges">
                    <div id="b1"><img src={ Logo }/><h3>OKAY<br/>STUDENT</h3> </div>
                    <div id="b1"><img src={ Logo }/><h3>GUCCI<br/>HOMEWORK</h3> </div>
                    <div id="b1"><img src={ Logo }/><h3>BEST<br/>TEAMWORK</h3> </div>            
                    <div id="b2"><img src={ Logo }/><h3>GOOD<br/>STUDENT</h3> </div>
                    <div id="b2"><img src={ Logo }/><h3>GUCCI<br/>HOMEWORK</h3> </div>
                    <div id="b2"><img src={ Logo }/><h3>BEST<br/>TEAMWORK</h3> </div>
                </div>
                <div className="help">
                    <h1>Read message/answer</h1>
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

const connectedAdminPage = connect(mapStateToProps)(AdminPage);
export { connectedAdminPage as AdminPage };