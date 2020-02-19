import React, {PureComponent as Component} from 'react'

function Login ({...props}) {
    const typeDef = props.type ? props.type : 'text'
    return (
        <h2>Login</h2>
    )
}

export default Login