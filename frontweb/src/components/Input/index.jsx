import React, {PureComponent as Component} from 'react'
import './index.style.scss'

function Input ({...props}) {
    const typeDef = props.type ? props.type : 'text'
    
    return (
        <input 
        type={typeDef} 
        placeholder={props.placeholder}
        className={`inp ${props.color}`} />
    )
}

export default Input