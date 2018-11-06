import React from 'react';
import { Link } from 'react-router-dom';
import { connect } from 'react-redux';

import { userActions } from '../_actions';

class RegisterPage extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            data: {
		"date" : "",
		"students" : [ "" ],
		"subject_id" : ""
		},
            submitted: false
        };

        this.handleChange = this.handleChange.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    componentDidMount() {
    fetch('http://localhost:8080/save')
      .then(response => response.json())
      .then(data => this.setState({ data })
	  );

    localStorage.setItem("data",this.data);
    }

    

    render() {
        
        return (
            <div className="col-md-6 col-md-offset-3">
                <a href="#">Mentes</a>
            </div>
        );
    }
}

function mapStateToProps(state) {
    const { registering } = state.registration;
    return {
        registering
    };
}

const connectedRegisterPage = connect(mapStateToProps)(RegisterPage);
export { connectedRegisterPage as RegisterPage };