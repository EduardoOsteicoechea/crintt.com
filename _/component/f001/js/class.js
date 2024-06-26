
export default class component 
{
	constructor
	(
		id,
		component_name,
		root_folder,
		component_folder,
		session,
		data,
		component,
		form,
	) 
	{
		this.id =                              id
		this.component_name =                  component_name
		this.root_folder =                     root_folder
		this.component_folder =                component_folder
		this.session =                         session
		this.data =                            data
		this.component =                       document.getElementById(component)
		this.form =                       		document.getElementById(form)
	}
}