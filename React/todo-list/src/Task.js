import React from "react";

class Task extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      task_done: props.task_done,
      id: props.id,
      task_name: props.task_name,
    };
  }

  handleCheckboxChange = (event) => {
    const checkboxState = event.target.checked;
    this.setState((prev_state) => {
      return {
        task_name: prev_state.task_name,
        task_done: checkboxState,
      };
    });
    this.props.parentCheckboxChangeCallback(
      this.state.id,
      event.target.checked
    );
  };

  render() {
    return (
      <div>
        <label
          className={
            this.state.task_done ? "task-label-done" : "task-label-todo"
          }
        >
          <input
            type="checkbox"
            defaultChecked={this.state.task_done ? "checked" : ""}
            onChange={this.handleCheckboxChange}
          />
          {this.state.task_name}
        </label>
      </div>
    );
  }
}

export default Task;
