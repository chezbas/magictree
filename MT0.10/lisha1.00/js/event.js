/**
 * Get the user event type
 * @param p_event
 * @returns
 */
function lisha_user_event_get_type(p_event)
{
	if(p_event == __LMOD_OPEN__)
	{
		return __lisha_INTERNAL__;
	}
	else
	{
		return __lisha_EXTERNAL__;
	}
}

/**
 * lisha internal action
 * @param p_action
 * @param lisha_id
 */
function lisha_user_action(p_action,lisha_id)
{
	switch(p_action) 
	{
		case __LMOD_OPEN__:
			lisha_lmod_click(lisha_id);
			break;
	}
}


function lisha_execute_event(p_event,p_moment,lisha_id)
{
	/* Get the event to do */
	if(typeof(eval('lisha.'+lisha_id+'.event')) != 'undefined')
	{
		for(var lisha_dest in eval('lisha.'+lisha_id+'.event.evt'+p_event))
		{
			for(var lisha_to_event in eval('lisha.'+lisha_id+'.event.evt'+p_event+'.'+lisha_dest))
			{
				for(var actions in eval('lisha.'+lisha_id+'.event.evt'+p_event+'.'+lisha_dest+'.'+lisha_to_event))
				{
					var action_to_do = eval('lisha.'+lisha_id+'.event.evt'+p_event+'.'+lisha_dest+'.'+lisha_to_event+'.'+actions);
					if(lisha_user_event_get_type(action_to_do.exec) == __lisha_INTERNAL__)
					{
						/* Internal action to do */
						if(action_to_do.moment == p_moment)
						{
							lisha_user_action(action_to_do.exec,lisha_dest);
						}
					}
					else
					{
						/* External action to do */
						if(action_to_do.moment == p_moment)
						{
							/* #URL SIBY */
							eval(action_to_do.exec);
						}
					}
				}
			}
		}
	}
}