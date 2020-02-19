import React from 'react'
import './index.style.scss'

function Button ({...props}) {
    const typeDef = props.type ? props.type : 'default'
    return (
        <button
            type="button"
            className={`btn ${typeDef}`}
            onClick={props.onClick}
            disabled={props.disabled}
        >{props.children}</button>
    )
}

export default Button