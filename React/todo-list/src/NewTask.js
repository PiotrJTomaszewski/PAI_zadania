import React from "react";

class NewTask extends React.Component {
  constructor(props) {
    super(props);
  }

  handleFormSubmit = (event) => {
    const new_task_name = event.target[0].value;
    event.target[0].value = "";
    if (new_task_name.length > 0) this.props.parentAddTaskCallback(new_task_name);
    event.preventDefault();
  };

  render() {
    return (
      <div>
        <form onSubmit={this.handleFormSubmit}>
            <input type="text" ref={this.input_ref}/>
            <button type="submit" onSubmit={this.handleSubmitClick}>Add</button>
        </form>
      </div>
    );
  }
}

export default NewTask;
