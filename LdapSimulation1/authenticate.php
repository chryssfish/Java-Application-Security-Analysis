<?php
function authenticate($user, $password) {
	if(empty($user) || empty($password)) return false;
 
	// active directory server
	
	$ldap_password="KLAxx8912";
	$ldap_dn = "cn=admin,dc=mesitiko,dc=gr";
    $ldap_tree="ou=People,dc=mesitiko,dc=gr";
	$ldap_tree_group="ou=Groups,dc=mesitiko,dc=gr";
	$ldap= ldap_connect("ldap://192.168.7.2");
 
	// configure ldap params
	ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION,3);
	ldap_set_option($ldap,LDAP_OPT_REFERRALS,0);
    $result=ldap_bind($ldap,$ldap_dn,$ldap_password);
	
	     $filter = "(uid=$user)";
         $filter_group="(&(objectClass=groupOfNames)(member=uid=".ldap_escape($user, "", LDAP_ESCAPE_FILTER).",ou=People,dc=mesitiko,dc=gr))";
				
			if($result)
			{  
				
				$result = ldap_search($ldap, $ldap_tree,$filter) or exit("Unable to search LDAP server");
				$entries = ldap_get_entries($ldap, $result);
				
				// check user 
				if($entries['count'] == 0)
				   
			      header("Location: /LdapSimulation1/fail.php");
				
				else
				{ for ($i=0;  $i< $entries['count']; $i++)
					{    
						  if (isset($entries[$i]["userpassword"][0]))
						  {  
								 if( check_password($entries[$i]["userpassword"][0],$password))
								 {  
							            //check group member
									    $check_group= ldap_search($ldap ,$ldap_tree_group,$filter_group); 
									    $group_member_entries = ldap_get_entries($ldap, $check_group);
							        	ldap_unbind($ldap);
										if($group_member_entries['count'] == 0) header("Location: /LdapSimulation1/fail.php");
										else 
										{
											 //session check group
											 $access=0;
											 if( $group_member_entries[$i]['cn'][0]=="admins") 
											 {   $access="Admin";
											 }
											 else if ( $group_member_entries[$i]['cn'][0]=="users")
                                             {
												 $access="User";
											 }												 
											 else if ( $group_member_entries[$i]['cn'][0]=="Assistants") 
											 {
												 $access="Assistant";
											 }		
												 $_SESSION['user'] = $user;
			                                     $_SESSION['access'] = $access;
                                                 header("Location: /LdapSimulation1/memberpage.php");												 
										}
											
									  
									  
								  }
								  else header("Location: /LdapSimulation1/fail.php");
								
		 
						   } 
							
					 }
				}
			}
			
		}
		
function check_password($ldapPass, $plainTextPass) { 
	if (strtoupper(substr($ldapPass, 0, 6)) != '{SSHA}') return FALSE; 
	$passStr = base64_decode(substr($ldapPass, 6)); 
	return substr($passStr, 0, 20) == sha1($plainTextPass.substr($passStr, 20), TRUE); 
}
 
?>