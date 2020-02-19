import React from 'react'
import Button from '../Button'
import './index.style.scss'

function ModalSplash ({...props}) {
    const colorDef = props.type === 'login' ? 'wine' : 'green';
    const isClosed = !props.opened ? 'closed' : null
    return (
        <section className={`modal ${colorDef} ${isClosed}`}>
            <h2 className={`title ${colorDef}`}>{props.title}</h2>
            {props.children}
    <Button type={colorDef} onClick={props.onClick}>{props.label}</Button>
        </section>
    )
}

export default ModalSplash