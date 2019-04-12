<?php
function register($surname,$name ,$username ,$email ,$password) {
	if(empty($surname) || empty($name) || empty($username) || empty($email) ||empty($password)) return false;
 
	// active directory server
	
	$ldap_password="KLAxx8912";
	$ldap_dn = "cn=admin,dc=mesitiko,dc=gr";
	$group_name = "cn=users,ou=Groups,DC=mesitiko,DC=gr";
	$ldap= ldap_connect("ldap://192.168.7.2");
 
	// configure ldap params
	ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION,3);
	ldap_set_option($ldap,LDAP_OPT_REFERRALS,0);
    $result=ldap_bind($ldap,$ldap_dn,$ldap_password);
		  
		  
	
		if($result)
		{  
				// Setup the data that will be used to create the user
				// This is in the form of a multi-dimensional
				// array that will be passed to AD to insert.
  
				$adduserAD["cn"] =$name." ".$surname;
				$adduserAD["sn"] =$name;
				$adduserAD['mail'] = $email;
				$adduserAD["objectClass"][0] = "inetOrgperson";
				$adduserAD["objectClass"][1] = "top";
				$adduserAD["userPassword"] =hash_password($password);

				$base_dn = "uid=".$username.",ou=People,DC=mesitiko,DC=gr";
				
					if(ldap_add($ldap, $base_dn, $adduserAD) == true)
					{  
					       header("Location: /LdapSimulation1/suc.php");
		               
					}
					else  header("Location: /LdapSimulation1/fail.php");
				
				//adding group members	
				
				$group_info['member'] = $base_dn;
				    if(ldap_mod_add($ldap,$group_name,$group_info)==true)
					{  
					       header("Location: /LdapSimulation1/suc.php");
		               
					}
					else  header("Location: /LdapSimulation1/fail.php");
        }
		ldap_close($ldap); 
}
function hash_password($password) // SSHA with random 4-character salt
 {
	 $salt = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',4)),0,4);
	 return '{SSHA}' . base64_encode(sha1( $password.$salt, TRUE ). $salt);
 }


?>